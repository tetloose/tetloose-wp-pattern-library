import styles from './animated-banner.module.scss'
import { ComponentClass } from '@utilities'

export class AnimatedBanner extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.css(module, styles, 1000)
    }
}

export default (module: HTMLElement) => new AnimatedBanner(module)
