import { ComponentClass } from '../../utilities'

export class Form extends ComponentClass {
    constructor(module: HTMLElement) {
        super(module)
    }
}

export default (module: HTMLElement) => new Form(module)
