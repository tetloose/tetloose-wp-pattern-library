import styles from './navigation.module.scss'
import { ComponentClass } from '../../utilities'

export class Navigation extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.cssModule(this.module, styles)
        this.loadEventListener()
    }

    loadEventListener() {
        this.subNav(this.module, styles['sub-nav__item'], styles['is-active'])
    }
}

export default (module: HTMLElement) => new Navigation(module)
