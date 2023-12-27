import { ComponentClass } from '@utilities'

export class FullBleedImage extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.load()
    }
}

export default (module: HTMLElement) => new FullBleedImage(module)
