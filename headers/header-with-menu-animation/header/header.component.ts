import styles from './header.module.scss'
import { ComponentClass } from '@utilities'

export class Header extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.css(module, styles)
        this.addScroll()
        this.setState()
    }

    setState() {
        const { module } = this
        const menu = module.querySelector(`.${styles['menu']}`) as HTMLElement
        const trigger = module.querySelector(`.${styles['trigger']}`) as HTMLElement
        const nav = module.querySelector(`.${styles['nav']}`) as HTMLElement
        const subNav = module.querySelector(`.${styles['sub-nav']}`) as HTMLElement

        if (menu) {
            const { dataset } = menu
            const { closed, open } = dataset

            this.updateState('openText', open ? open : '')
            this.updateState('closedText', closed ? closed : '')
        } else {
            this.updateState('openText', 'open test')
            this.updateState('closedText', 'closed test')
        }

        this.updateState('menu', menu ? menu : null)
        this.updateState('trigger', trigger ? trigger : null)
        this.updateState('nav', nav ? nav : null)
        this.updateState('subNav', subNav ? subNav : null)
        this.updateState('position', 0)
        this.updateState('navOpen', false)
        this.loadEventListener()
    }

    loadEventListener() {
        const { module, state } = this
        const { navOpen } = state
        const { trigger, nav, subNav } = state

        if (
            trigger instanceof HTMLElement &&
            nav instanceof HTMLElement &&
            subNav instanceof HTMLElement
        ) {
            (subNav as HTMLElement).setAttribute('tabindex', '-1')

            module.addEventListener('keyup', (e: KeyboardEvent) =>
                e.key === 'Escape' && navOpen &&
                this.navToggle(trigger, nav, subNav)
            )

            trigger.addEventListener('click', () => this.navToggle(trigger, nav, subNav))
        }
    }

    addScroll() {
        window.addEventListener('scroll', () => { this.headerScroll() })
    }

    headerScroll() {
        const { module, state } = this
        const { position } = state

        if (typeof position === 'number') {
            const { offsetHeight, classList } = module
            const { scrollY } = window
            const moduleHeight = offsetHeight
            const offsetY: number = scrollY

            if (offsetY > position && !classList.contains(styles['is-hidden']) && offsetY >= position + moduleHeight) {
                classList.add(styles['is-hidden'])
            } else if (offsetY < position && classList.contains(styles['is-hidden'])) {
                classList.remove(styles['is-hidden'])
            }

            this.updateState('position', offsetY)
        }
    }

    navToggle(trigger: Element, nav: Element, focusElem: Element) {
        const { state } = this
        const { menu, navOpen, openText, closedText } = state
        const html = document.querySelector('html') as HTMLElement
        const title = trigger.querySelector(`.${styles['trigger__title']}`)
        const innerWidth = window.innerWidth

        this.updateState('navOpen', !navOpen)

        if (this.state?.navOpen && menu instanceof HTMLElement) {
            menu.classList.add(styles['is-flex'], styles['nav-open'])
            trigger.classList.add(`${styles['is-active']}`)
            trigger.setAttribute('aria-expanded', 'true')
            trigger.setAttribute('aria-label', `${openText}`)
            nav.setAttribute('aria-expanded', 'true')
            html.classList.add('no-scroll')

            if (title) {
                title.innerHTML = `${openText}`
            }

            setTimeout(() => {
                nav.classList.add(`${styles['angle-open']}`)

                setTimeout(() => {
                    menu?.classList.add(styles['sub-nav-visible'])

                    if (focusElem && innerWidth >= 768) {
                        setTimeout(() => {
                            if (focusElem instanceof HTMLElement) focusElem.focus()
                        }, 200)
                    }
                }, 400)
            }, 200)
        } else {
            (menu as HTMLElement)?.classList.remove(styles['sub-nav-visible'])
            trigger.setAttribute('aria-expanded', 'false')
            trigger.setAttribute('aria-label', `${closedText}`)
            nav.setAttribute('aria-expanded', 'false')

            if (trigger instanceof HTMLElement && innerWidth >= 768) trigger.focus()

            setTimeout(() => {
                nav.classList.add(`${styles['angle-close']}`)

                setTimeout(() => {
                    if (title) {
                        title.innerHTML = `${closedText}`
                    }

                    (menu as HTMLElement)?.classList.remove(styles['nav-open'])
                    trigger.classList.remove(`${styles['is-active']}`)
                    nav.classList.remove(`${styles['angle-open']}`, `${styles['angle-close']}`)

                    setTimeout(() => {
                        (menu as HTMLElement)?.classList.remove(styles['is-flex'])
                        html.classList.remove('no-scroll')
                    }, 200)
                }, 400)
            }, 200)
        }
    }
}

export default (module: HTMLElement) => new Header(module)
