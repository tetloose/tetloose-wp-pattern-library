import styles from './excerpt.module.scss'
import { ComponentClass } from '../../utilities'

export class Excerpt extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.cssModule(this.module, styles)
    }
}

export default (module: HTMLElement) => new Excerpt(module)
