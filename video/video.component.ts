import { ComponentClass } from '@utilities'

export class Video extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)

        this.load()
    }
}

export default (module: HTMLElement) => new Video(module)
