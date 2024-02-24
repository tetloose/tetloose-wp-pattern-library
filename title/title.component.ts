import styles from './title.module.scss'
import { ComponentClass } from '@utilities'

export class Title extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.css(module, styles)
    }
}

export default (module: HTMLElement) => new Title(module)
