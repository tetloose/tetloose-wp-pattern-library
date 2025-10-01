import type { HTMLProps, ButtonProps } from '@utilities'
import { ComponentClass } from '@utilities'
import Swiper from 'swiper'
import { Navigation, Keyboard, Grid } from 'swiper/modules'
import styles from './logos.module.scss'
import 'swiper/css'
import 'swiper/css/grid'

export class Logos extends ComponentClass {
    autoHeight: boolean
    loop: boolean
    slidesPerViewDesktop: number
    slidesPerViewMobile: number
    rowsDesktop: number
    rowsMobile: number
    slider: HTMLProps
    next: ButtonProps
    prev: ButtonProps

    constructor(module: HTMLElement) {
        super(module)

        const { dataset } = module
        const {
            autoHeight = 'false',
            loop = 'false',
            slidesPerViewDesktop = '4',
            slidesPerViewMobile = '2',
            rowsDesktop = '1',
            rowsMobile = '1'
        } = dataset

        this.autoHeight = autoHeight === 'true' ? true : false
        this.loop = loop === 'true' ? true : false
        this.slidesPerViewMobile = Number(slidesPerViewMobile)
        this.slidesPerViewDesktop = Number(slidesPerViewDesktop)
        this.rowsDesktop = Number(rowsDesktop)
        this.rowsMobile = Number(rowsMobile)
        this.slider = module.querySelector('.js-slider')
        this.next = module.querySelector('.js-sliderNext')
        this.prev = module.querySelector('.js-sliderPrev')
        this.css(module, styles)
        this.init()
    }

    init() {
        const {
            slider,
            next,
            prev,
            autoHeight,
            loop,
            slidesPerViewDesktop,
            slidesPerViewMobile,
            rowsDesktop,
            rowsMobile
        } = this

        if (slider && next && prev) {
            Swiper.use([Navigation, Keyboard, Grid])

            new Swiper(slider, {
                autoHeight: autoHeight,
                navigation: {
                    nextEl: next,
                    prevEl: prev
                },
                keyboard: {
                    enabled: true
                },
                breakpoints: {
                    768: {
                        slidesPerView: slidesPerViewDesktop,
                        grid: {
                            rows: rowsDesktop,
                            fill: 'row'
                        }
                    },
                    0: {
                        slidesPerView: slidesPerViewMobile,
                        grid: {
                            rows: rowsMobile,
                            fill: 'row'
                        }
                    }
                },
                loop: loop
            })
        }
    }
}

export default (module: HTMLElement) => new Logos(module)
