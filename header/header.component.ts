import styles from './header.module.scss'
import { ComponentClass } from '../../utilities'

export class Header extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)
        this.state = {
            position: 0
        }
        this.cssModule(this.module, styles)

        window.addEventListener('scroll', () => { this.headerScroll() })
    }

    headerScroll() {
        if (typeof this.state?.position === 'number') {
            const moduleHeigtht = this.module.offsetHeight
            const offsetY: number = window.pageYOffset

            if (offsetY > this.state?.position && !this.module.classList.contains(styles['is-hidden']) && offsetY >= moduleHeigtht) {
                this.module.classList.add(styles['is-hidden'])
            } else if (offsetY < this.state?.position && this.module.classList.contains(styles['is-hidden'])) {
                this.module.classList.remove(styles['is-hidden'])
            }

            this.updateState('position', offsetY)
        }
    }
}

export default (module: HTMLElement) => new Header(module)
