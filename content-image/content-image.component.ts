import styles from './content-image.module.scss'
import { ComponentClass } from '../../utilities'

export class ContentImage extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.cssModule(this.module, styles)
    }
}

export default (module: HTMLElement) => new ContentImage(module)
