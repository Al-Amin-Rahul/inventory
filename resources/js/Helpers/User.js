import Store from './Store'
import Token from './Token'

class User{
    responseAfterLogin(response){
        const token = response.data.access_token
        const name  = response.data.name
        if(Token.isValid(token)){
            Store.saveToken(token, name)
        }
    }

    hasToken(){
        const saveToken = localStorage.getItem('token')
        if(saveToken){
            return Token.isValid(saveToken) ? true : false
        }
        return false
    }

    isLoggedIn(){
        return this.hasToken()
    }

    logOut(){
        Store.removeToken()
    }
}
export default User = new User();