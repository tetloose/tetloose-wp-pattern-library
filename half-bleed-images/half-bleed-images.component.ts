import { ComponentClass } from '@utilities'

export class HalfBleedImages extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.load()
    }
}

export default (module: HTMLElement) => new HalfBleedImages(module)
