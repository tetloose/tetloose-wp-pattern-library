import { expect, test, expectTypeOf } from 'vitest'
import { modules } from '@config'
import { Faqs } from './faqs.component'
import styles from './faqs.module.scss'

test('SCSS Module returns an object and contains faqs', (): void => {
    expect(styles).toBeTruthy()
    expect(styles).toBeTypeOf('object')
    expect(styles['faqs']).toMatch(/(faqs)/i)
})

test('Faqs should exist and be a function', (): void => {
    expect(typeof Faqs).toBe('function')
    expectTypeOf(modules.Faqs).toBeFunction()
})

test('Faqs should exist in modules', (): void => {
    expect(modules.Faqs).toBeDefined()
    expect(typeof modules.Faqs).toBe('function')
})
