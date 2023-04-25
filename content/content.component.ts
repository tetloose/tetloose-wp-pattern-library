import { ComponentClass } from '../../utilities'

export class Content extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)
    }
}

export default (module: HTMLElement) => new Content(module)
