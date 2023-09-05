const db = new Dexie('MyDatabase');

db.version(1).stores({
  friends: '++id, name, age'
});

async function addUser() {
  await db.friends.add({
		name: 'Camilla',
		age: 25,
		street: 'East 13:th Street'
	});

  alert('user added')
}

async function userList() {
  const oldFriends = await db.friends
  .where('age').above(75)
  .toArray();

  console.log('old: ', oldFriends)

  return oldFriends
}