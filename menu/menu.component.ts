import styles from './menu.module.scss'
import { ComponentClass } from '../../utilities'

export class Menu extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)
        this.state = {
            closedText: this.module.dataset.closed ? this.module.dataset.closed : '',
            openText: this.module.dataset.open ? this.module.dataset.open : '',
            nav: false
        }

        this.cssModule(this.module, styles)
        this.loadEventListener()
    }

    loadEventListener() {
        const subNav = this.module.querySelector(`.${styles['sub-nav']}`)
        const trigger = this.module.querySelector('.js-menuTrigger')
        const nav = this.module.querySelector(`.${styles['nav']}`)
        const focusElem = subNav?.querySelector('a')

        if (trigger && focusElem && nav) {
            this.module.addEventListener('keyup', (e: KeyboardEvent) => {
                if (e.key === 'Escape' && this.state?.nav) {
                    this.navToggle(trigger, nav, focusElem)
                }
            })

            trigger.addEventListener('click', () => this.navToggle(trigger, nav, focusElem))
        }
    }

    navToggle(trigger: Element, nav: Element, focusElem: HTMLElement) {
        const html = <HTMLElement>document.querySelector('html')
        const title = trigger.querySelector('.js-menuTriggerTitle')
        const innerWidth = window.innerWidth

        this.updateState('nav', this.state ? !this.state.nav : false)

        if (this.state?.nav) {
            this.module.classList.add(styles['nav-open'])
            nav?.setAttribute('aria-expanded', 'true')
            trigger.classList.add('is-active')
            trigger?.setAttribute('aria-expanded', 'true')
            trigger?.setAttribute('aria-label', `${this.state.openText}`)
            html.classList.add('no-scroll')

            if (title) title.innerHTML = `${this.state.openText}`

            setTimeout(() => {
                nav?.classList.add('u-animate-angle-open')

                setTimeout(() => {
                    this.module.classList.add(styles['sub-nav-visible'])

                    if (focusElem && innerWidth >= 768) {
                        setTimeout(() => {
                            focusElem.focus()
                        }, 200)
                    }
                }, 400)
            }, 200)

        } else {
            this.module.classList.remove(styles['sub-nav-visible'])
            nav.setAttribute('aria-expanded', 'false')
            trigger.setAttribute('aria-expanded', 'false')
            trigger.setAttribute('aria-label', `${this.state?.closedText}`)

            if (trigger instanceof HTMLElement && innerWidth >= 768) {
                trigger.focus()
            }

            setTimeout(() => {
                nav.classList.add('u-animate-angle-close')

                setTimeout(() => {
                    this.module.classList.remove(styles['nav-open'])
                    if (title instanceof HTMLElement) title.innerHTML = `${this.state?.closedText}`
                    nav?.classList.remove('u-animate-angle-open', 'u-animate-angle-close')
                    trigger.classList.remove('is-active')
                    html.classList.remove('no-scroll')
                }, 400)
            }, 200)
        }
    }
}

export default (module: HTMLElement) => new Menu(module)
