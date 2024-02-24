import { ComponentClass } from '@utilities'

export class FullBleedVideo extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.load()
    }
}

export default (module: HTMLElement) => new FullBleedVideo(module)
