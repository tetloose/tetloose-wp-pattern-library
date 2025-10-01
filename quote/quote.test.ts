import { expect, test, expectTypeOf } from 'vitest'
import { modules } from '@config'
import { Quote } from './quote.component'
import styles from './quote.module.scss'

test('SCSS Module returns an object and contains quote', (): void => {
    expect(styles).toBeTruthy()
    expect(styles).toBeTypeOf('object')
    expect(styles['quote']).toMatch(/(quote)/i)
})

test('Quote should exist and be a function', (): void => {
    expect(typeof Quote).toBe('function')
    expectTypeOf(modules.Quote).toBeFunction()
})

test('Quote should exist in modules', (): void => {
    expect(modules.Quote).toBeDefined()
    expect(typeof modules.Quote).toBe('function')
})
