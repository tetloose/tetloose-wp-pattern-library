import { ComponentClass } from '@utilities'
import styles from './image.module.scss'

export class Images extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.css(module, styles)
    }
}

export default (module: HTMLElement) => new Images(module)
