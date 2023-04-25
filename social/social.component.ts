import styles from './social.module.scss'
import { ComponentClass } from '../../utilities'

export class Social extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.cssModule(this.module, styles)
    }
}

export default (module: HTMLElement) => new Social(module)
