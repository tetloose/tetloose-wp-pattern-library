import type { HTMLProps, HTMLNodeProps } from '@utilities'
import { ComponentClass, getHeight } from '@utilities'
import styles from './faqs.module.scss'

export class Faqs extends ComponentClass {
    items: HTMLNodeProps
    triggers: HTMLNodeProps

    constructor(module: HTMLElement) {
        super(module)

        this.items = module.querySelectorAll('.js-item')
        this.triggers = module.querySelectorAll('.js-trigger')

        this.setState()
        this.css(this.module, styles)
    }

    setState() {
        const { module } = this
        const { dataset } = module
        const { slideDuration } = dataset

        this.updateState('prevent', false)
        this.updateState('slideDuration', slideDuration ? parseInt(`${slideDuration}`) : 200)
        this.loadEventListener()
    }

    loadEventListener() {
        const { module } = this

        module.addEventListener('click', (e: MouseEvent): void => {
            const { target } = e

            if (
                target instanceof HTMLElement &&
                target.classList.contains('js-trigger')
            ) {
                const { dataset } = target
                const { index } = dataset

                this.updateState(
                    'faqIndex',
                    index ? parseInt(index, 10) : 0
                )

                this.trigger()
            }
        })
    }

    trigger(): void {
        const { state, items, triggers } = this
        const { slideDuration, faqIndex, prevent } = state
        const item = items ? items[typeof faqIndex === 'number' ? faqIndex : 0] : null
        const trigger = triggers ? triggers[typeof faqIndex === 'number' ? faqIndex : 0] : null
        const reveal = item?.querySelector('.js-reveal') as HTMLProps
        const height = reveal ? `${getHeight(reveal)}px` : '0px'

        if (
            !prevent &&
            item &&
            trigger &&
            reveal &&
            height
        ) {
            this.updateState(
                'prevent',
                true
            )

            if (!item.classList.contains(styles['is-visible'])) {
                item.classList.add(styles['is-visible'])
                reveal.style.height = height

                setTimeout(() => {
                    reveal.style.height = ''
                    trigger.setAttribute('aria-expanded', 'true')
                    reveal.focus()
                    this.updateState(
                        'prevent',
                        false
                    )
                }, slideDuration as number)
            } else {
                reveal.style.height = reveal.scrollHeight + 'px'

                setTimeout(() => {
                    reveal.style.height = '0'
                }, 1)

                setTimeout(() => {
                    item.classList.remove(styles['is-visible'])
                    trigger.setAttribute('aria-expanded', 'false')
                    this.updateState(
                        'prevent',
                        false
                    )
                }, slideDuration as number)
            }
        }
    }
}

export default (module: HTMLElement) => new Faqs(module)
