import styles from './half-bleed-images.module.scss'
import { ComponentClass } from '@utilities'

export class HalfBleedImages extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.css(module, styles)
    }
}

export default (module: HTMLElement) => new HalfBleedImages(module)
