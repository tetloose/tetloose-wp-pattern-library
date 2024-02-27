# Song Kick

Component to embed Song Kick artist up and coming gigs with fallbacks.

## Module.ts

Update `src/js/config/modules.config.ts` with:

`SongKick: () => import(/* webpackChunkName: "song-kick" */ '@components/song-kick/song-kick.component')`

## Types

Update StateProps -> `src/utilities/utilities.types.ts`

```ts
import { EventProps } from '../components/song-kick/song-kick.types'

export type StateProps = string | boolean | number | Element | HTMLElement | HTMLVideoElement | HTMLButtonElement | MotionOptionsProps | LoadingProps | EventProps | null
```

## ACF Flexible Content Component

- Location: `**ACF** -> **Shared Fields** -> **Components**`
- Name: `Song kick`
- id: `song_kick`

## Navigation

[<< BACK TO HOME](../README.md)
