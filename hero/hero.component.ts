import styles from './hero.module.scss'
import { ComponentClass } from '../../utilities'

export class Hero extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.cssModule(this.module, styles)
    }
}

export default (module: HTMLElement) => new Hero(module)
