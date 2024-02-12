const submitButton = document.getElementById('submitButton')


submitButton?.addEventListener('click', () => {
    const name = document.getElementById('name') as HTMLInputElement
    if (validate(name.value)) {
        const form = document.getElementById('entryForm') as HTMLFormElement
        form.action = '/game'
        form.submit()
    }
})

const validate = (name?: string) => {
    if (!name) {
        alert('名前が入力されていません')
        return false
    }
    if (!checkPlayersCount(name)) {
        alert('人数は2 ~ 5人です')
        return false
    }
    return true
}

const checkPlayersCount = (name: string) => {
    const players = name.split(' ')
    return 5 >= players.length  && players.length > 1
}
