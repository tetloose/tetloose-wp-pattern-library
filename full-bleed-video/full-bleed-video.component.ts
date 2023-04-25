import { ComponentClass } from '../../utilities'

export class FullBleedVideo extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)
    }
}

export default (module: HTMLElement) => new FullBleedVideo(module)
