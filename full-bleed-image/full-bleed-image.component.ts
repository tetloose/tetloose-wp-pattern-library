import { ComponentClass } from '../../utilities'

export class FullBleedImage extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)
    }
}

export default (module: HTMLElement) => new FullBleedImage(module)
