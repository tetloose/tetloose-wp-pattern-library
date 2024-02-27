import styles from './song-kick.module.scss'
import { ComponentClass, AppendNode, request } from '@utilities'
import { row, column, content } from '@elements'
import { ResProps } from './song-kick.types'

export class SongKick extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.css(module, styles)
        this.setState()
    }

    setState() {
        const { module } = this
        const { dataset } = module
        const { artistId, city, venue, buttonText, artistClassnames, fallback } = dataset

        this.updateState('artistId', artistId ? artistId : '')
        this.updateState('artistCity', city ? city : 'City')
        this.updateState('artistVenue', venue ? venue : 'Venue')
        this.updateState('artistButtonText', buttonText ? buttonText : 'Tickets')
        this.updateState('artistClassnames', artistClassnames ? artistClassnames : '')
        this.updateState('fallback', fallback ? fallback : '')
        this.updateState('events', null)
        this.updateState('error', '')
        this.updateState('api', `https://api.songkick.com/api/3.0/artists/${artistId}/calendar.json?apikey=io09K9l3ebJxmxe2`)
        this.fetchEvents()
    }

    fetchEvents() {
        (async () => {
            try {
                const { state } = this
                const { api } = state
                const res = await request<ResProps>(api ? api.toString() : '')
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
        const { module, state } = this
        const { fallback } = state

        const columns = column(
            content(
                `${fallback ? fallback : ''}`,
                styles['song-kick__fallback']
            ),
            {},
            ''
        )

        new AppendNode(
            module,
            row(columns)
        )
    }

    showEvents() {
        const { module, state } = this
        const { events, artistCity, artistVenue, artistButtonText, artistClassnames } = state

        if (state && events) {
            const columns = Object
                .entries(events)
                .map(event => {
                    const {
                        uri,
                        start,
                        displayName,
                        venue,
                        location
                    } = event[1]
                    const newDate = new Date(start.date)
                    const theContent = `
                        <h3>${displayName}</h3>
                        <h4><small>${newDate.getDate()}/${newDate.getMonth() + 1}/${newDate.getFullYear()}</small></h4>
                        <ul>
                            <li><strong>${artistCity}: </strong>${location.city}</li>
                            <li><strong>${artistVenue}: </strong>${venue.displayName}</li>
                        </ul>
                        <div class="l-action is-align-right">
                            <a class="u-btn is-inline" href="${uri}" target="_blank">${artistButtonText}</a>
                        </div>
                    `
                    const classNames = `${artistClassnames ? artistClassnames : ''} ${styles['song-kick__content'] ? styles['song-kick__content'] : ''}`

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
                module,
                row(columns)
            )
        }
    }
}

export default (module: HTMLElement) => new SongKick(module)
