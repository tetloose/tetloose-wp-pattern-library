import { ComponentClass } from '@utilities'

export class Content extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.load()
    }
}

export default (module: HTMLElement) => new Content(module)
