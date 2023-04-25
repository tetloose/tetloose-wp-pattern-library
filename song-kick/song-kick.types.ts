export type EventProps = {
    displayName: string
    type: string
    uri: string
    start: {
        date: string
    }
    venue: {
        displayName: string
    }
    location: {
        city: string
    }
}

export type ResProps = {
    resultsPage: {
        results: {
            event: EventProps
        }
    }
}
