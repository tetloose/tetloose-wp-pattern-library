# Song Kick

Add artist ID and generate a list of up and coming gigs.

## Module.ts

Update `src/js/config/modules.ts` with:

`SongKick: () => import(/* webpackChunkName: "song-kick" */ '../components/song-kick/song-kick.component')`

## Types

Add the EventProps to the StateProps.

`src/js/utilities/utilities.types.ts`

```
import { EventProps } from '../components/song-kick/song-kick.types'

export type StateProps = string | boolean | number | HTMLElement | EventProps | null

export type ObjectToStringProps = {
    [key: string]: string
}
```

## ACF Flexible Content Name

**ACF** -> **Shared Fields** -> **Components**

Song Kick

## Navigation

[<< BACK TO HOME](../README.md)
