import type { HTMLProps, ButtonProps } from '@utilities'
import { ComponentClass } from '@utilities'
import Swiper from 'swiper'
import { Navigation, Pagination, Keyboard } from 'swiper/modules'
import styles from './quote.module.scss'
import 'swiper/css'

export class Quote extends ComponentClass {
    quote: HTMLProps
    pagination: HTMLProps
    next: ButtonProps
    prev: ButtonProps

    constructor(module: HTMLElement) {
        super(module)

        this.quote = module.querySelector('.js-quote')
        this.pagination = module.querySelector('.js-pagination')
        this.next = module.querySelector('.js-quoteNext')
        this.prev = module.querySelector('.js-quotePrev')
        this.css(module, styles)
        this.init()
    }

    init() {
        const { quote, next, prev, pagination } = this

        if (quote && next && prev) {
            Swiper.use([Navigation, Pagination, Keyboard])

            new Swiper(quote, {
                slidesPerView: 1,
                autoHeight: false,
                navigation: {
                    nextEl: next,
                    prevEl: prev
                },
                pagination: {
                    el: pagination,
                    clickable: true
                },
                keyboard: {
                    enabled: true
                },
                loop: true
            })
        }
    }
}

export default (module: HTMLElement) => new Quote(module)
