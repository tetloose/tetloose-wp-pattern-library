import styles from './song-kick.module.scss'
import { ComponentClass, AppendNode, request } from '../../utilities/'
import { row, column, content } from '../../html'
import { ResProps } from './song-kick.types'

export class SongKick extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)
        this.state = {
            artistId: module.dataset.artistId ? module.dataset.artistId : '',
            artistCity: module.dataset.city ? module.dataset.city : 'City',
            artistVenue: module.dataset.venue ? module.dataset.venue : 'Venue',
            artistButtonText: module.dataset.buttonText ? module.dataset.buttonText : 'Tickets',
            artistClassnames: module.dataset.artistClassnames ? module.dataset.artistClassnames : '',
            fallback: module.dataset.fallback ? module.dataset.fallback : '',
            events: null,
            error: ''
        }

        this.cssModule(this.module, styles)
        this.fetchEvents()
    }

    fetchEvents() {
        (async() => {
            try {
                const api = `https://api.songkick.com/api/3.0/artists/${this.state?.artistId}/calendar.json?apikey=io09K9l3ebJxmxe2`
                const res = await request<ResProps>(api)
                const events = res.resultsPage.results.event

                if (events !== undefined) {
                    this.updateState('events', events)
                    this.showEvents()
                } else {
                    this.showFallback()
                }

            }
            catch (error) {
                this.updateState('error', `${error}`)
            }
        })()
    }

    showFallback() {
        const columns = column(
            content(
                `${this.state?.fallback}`,
                ''
            ),
            {},
            ''
        )

        new AppendNode(
            this.module,
            row(columns)
        )
    }

    showEvents() {
        if (this.state && this.state.events) {
            const { events } = this.state

            const columns = Object
                .entries(events)
                .map(event => {
                    const {
                        uri,
                        start,
                        venue,
                        location
                    } = event[1]
                    const newDate = new Date(start.date)
                    const theContent = `
                        <h3>
                            ${newDate.getDate()}/${newDate.getMonth() + 1}/${newDate.getFullYear()}
                        </h3>
                        <ul>
                            <li><strong>${this.state?.artistCity}: </strong>${location.city}</li>
                            <li><strong>${this.state?.artistVenue}: </strong>${venue.displayName}</li>
                        </ul>
                        <div class="l-action is-align-right">
                            <a class="u-btn is-inline" href="${uri}" target="_blank">${this.state?.artistButtonText}</a>
                        </div>
                    `
                    const classNames = `${this.state?.artistClassnames ? this.state?.artistClassnames : ''} ${styles['song-kick__content'] ? styles['song-kick__content'] : ''}`

                    return column(
                        content(
                            theContent,
                            `${classNames}`
                        ),
                        {
                            med: Object.keys(events).length > 1 ? 'half' : undefined
                        },
                        styles['song-kick__artist'] ? styles['song-kick__artist'] : ''
                    )
                }).join('')

            new AppendNode(
                this.module,
                row(columns)
            )
        }
    }
}

export default (module: HTMLElement) => new SongKick(module)
