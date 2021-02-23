class Store{

    saveToken(token, user){
        localStorage.setItem('token', token)
        localStorage.setItem('user', user)
    }
    removeToken(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }
}

export default Store = new Store();