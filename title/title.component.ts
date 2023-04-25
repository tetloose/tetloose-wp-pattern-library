import styles from './title.module.scss'
import { ComponentClass } from '../../utilities'

export class Title extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.cssModule(this.module, styles)
    }
}

export default (module: HTMLElement) => new Title(module)
