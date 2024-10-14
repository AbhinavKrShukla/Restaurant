
# Foodie
An online restaurant website.

## API Documentation

- Base URL : http://localhost

### 1. Authentication - Login and Logout

- **'/login'** : POST - <font color="green">[no-auth]</font> - to login
  - **Parameters:**
    - 'email' => 'required',
    - 'password' => 'required|integer|min:8',
  - **Return Response**
    - 'token': "[--token--]"
- **'/logout** : POST - <font color="orange">[auth]</font> - to logout
  - **Authorization:** Bearer Token

### 2. Home Page.
   
- **'/'** : GET - <font color="green">[no-auth]</font> - to get category wise food.

### 3. CRUD Operation on Food

URL: **food**
- **'/'** : GET - <font color="orange">[auth]</font> - to get list of all the food.
- **'/'** : POST - <font color="orange">[auth]</font> - to store a new food.
  - **Parameters:**
    - 'name' => 'required',
    - 'price' => 'required|integer',
    - 'category' => 'required',
    - 'description' => 'required',
    - 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
- **'/{id}'** : GET - <font color="green">[no-auth]</font> - to show a particular food.
- **'/{id}'** : PUT - <font color="orange">[auth]</font> - to update an existing food.
  - **Parameters:**
      - 'name' => 'required',
      - 'price' => 'required|integer',
      - 'category' => 'required',
      - 'description' => 'required',
      - 'image' => 'image|mimes:jpeg,png,jpg|max:2048',
- **'/{id}'** : DELETE - <font color="orange">[auth]</font> - to delete a food.


### 4. CRUD Operation on Category.

URL: **category**
- **'/'** : GET - <font color="orange">[auth]</font> - to get list of all the category.
- **'/'** : POST - <font color="orange">[auth]</font> - to store a new category.
    - **Parameters:**
        - 'name' => 'required',
- **'/{id}'** : GET - <font color="orange">[auth]</font> - to show a particular food.
- **'/{id}'** : PUT - <font color="orange">[auth]</font> - to update an existing food.
    - **Parameters:**
        - 'name' => 'required',
- **'/{id}'** : DELETE - <font color="orange">[auth]</font> - to delete a food.

    
