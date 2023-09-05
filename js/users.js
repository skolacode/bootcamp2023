function saveUser(username, password) {
  const userData = localStorage.getItem('users')
  let users = JSON.parse(userData)

  if(users && users.length >= 0) {

    // if users key exist, just append a new value into the array

    users.push({
      name: username,
      password: password
    })
  }
  else {

    // if users key does not exist, we need to initialize 
    // the key and set a first value into the array
    
    users = [
      {
        name: username,
        password: password
      }
    ]
  }

  // Save the latest value into the localstorage
  localStorage.setItem('users', JSON.stringify(users))
}

function getUser(username, password) {
  const userData = localStorage.getItem('users')
  let users = JSON.parse(userData)

  if(users && users.length > 0) {
    // users is an array

    const user = users.find((userObj) => {
      if(userObj.name === username && userObj.password === password) {
        return userObj
      }
    })

    if(user) {
      localStorage.setItem('loginUser', JSON.stringify(user))
      return true
    }

    alert('Username and password is not match')
    return false
  }
}
