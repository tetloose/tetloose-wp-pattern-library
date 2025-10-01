import { ComponentClass } from '@utilities'

export class Music extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.load()
    }
}

export default (module: HTMLElement) => new Music(module)
