import styles from './music.module.scss'
import { ComponentClass } from '@utilities'

export class Music extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.css(module, styles)
    }
}

export default (module: HTMLElement) => new Music(module)
