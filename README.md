## Context 


Il s'agit de créer une plateforme de commerce en ligne dédiée aux artisans. Le site mettra en avant leur savoir-faire et leurs produits. Les visiteurs pourront explorer le site sans s'inscrire, découvrir les divers produits, consulter les profils des artisans, filtrer leurs recherches et ajouter des articles à leur panier. Pour finaliser leur commande, les utilisateurs non enregistrés devront créer un compte. Une fois inscrits, les clients auront accès à leur profil, où ils pourront mettre à jour leurs informations et consulter l'historique de leurs commandes.

Le parcours client sera intuitif, favorisant un accès aisé aux produits et une commande simple. Les clients pourront suivre l'évolution de leur commande et, si nécessaire, l'annuler. Le site se concentrera sur la découverte des artisans français, offrant des pages dédiées présentant leur histoire et leurs produits à travers des photos. Les artisans devront s'inscrire pour accéder à leur espace personnel, où ils pourront personnaliser leur page avec des éléments tels que leur photo de profil et leur histoire. Ils pourront mettre en avant certains produits grâce à des photos et des descriptions, ajouter, modifier ou supprimer des articles, et consulter les pages d'autres artisans. Les artisans recevront des notifications pour des commandes spécifiques, personnalisables, leur permettant de les accepter ou de les refuser.

Le site vise à offrir aux clients une expérience mettant en avant la qualité et le savoir-faire français, en favorisant une connexion avec les artisans à travers leurs histoires et celles de leurs produits. Les artisans bénéficieront d'une meilleure visibilité grâce à un partage facile sur les réseaux sociaux et à l'efficacité du site. Le référencement du site sera optimisé, notamment avec l'utilisation du slug.

Le site sera conçu en respectant cinq principes du GreenIT pour minimiser son impact environnemental.

## Conception

- [ ] Proposer un traitement asynchrone lorsque c'est possible
- [x] Ne pas retenir les fonctionnalités non essentielles
- [ ] Supprimer les fonctionnalités non utilisées
- [ ] Limiter le recours aux carrousels
- [ ] Avoir un titre de page et une metadescription pertinents
- [ ] Optimiser les images
- [ ] Éviter les animations Javascript / CSS
- [ ] Découper les CSS
- [ ] Préférer les CSS aux images
- [ ] Valider votre code avec un Linter
- [ ] Mettre en place un sitemap efficient
### Datamodel

- #### Users
	- id int pk,
	- Role (Crafter, customer, Admin) int type enum,
	- email varchar(255),
	- phone_number varchar(55),
	- password varchar(255),
	- ??active(manage this in app)
- #### Crafters
	- id pk, 
	- user_id int fk,
	- information text,
	- story text,
	- crafting_proccess text,
	- location text,
	- material_preference text,
- #### Models
	- id int pk,
	- model_name varchar(55),
- #### Products
	- id int pk,
	- product_unit_price float,
	- product_name varchar(55),
	- product_description varchar(255),
	- product_status int enum (Waiting, validate, unvalidate),
	- model_id int fk nullable,
	- color varchar(55) nullable,
	- customizable int enum type nullable,
	- is_active bool,
- #### Categories
	- category_id int pk,
	- name varchar(55),
- #### Product category
	- product_id int fk,
	- category_id int fk,
- #### Materials
	- material_id int pk,
	- name varchar(55),
- #### Product has material
	-  product_id int fk
	- materials_id int fk
- #### Orders
	- id int pk,
	- user_id int fk,
	- status int enum type (Waiting for payment, payment validate, in preparation, shipped, Cancel, delivered, order return, in crafting),
	- order_price float,
	- order_date Date,
	- delivery_adress,
	- facturation_adress
- #### Product in Order
	- product_id int fk,
	- order_id int fk,
	- product_name varchar(55),
	- product_unit_price int,
	- quantity int,
- #### Adress
	- address_id int pk,
	- address_name varchar(55),
	- address_type int enum (Devlivery address, facturation address, both),
	- firstname varchar(55),
	- lastname varchar(55),
	- first_address varchar(255),
	- second_address varchar(255),
	- postal_code varchar(55),
	- user_id int fk,
- #### Images
	- id int pk,
	- path varchar(255),
	- size varchar(255),
    - imageable_type varchar(255),
    - imageable_id varchar(255)
        
### Endpoints

| Endpoint | Type de requête | Page |
| ---- | ---- | ---- |
| / | GET | Homepage |
| /register | POST | register page |
| /login | POST(safe) | login page |
| /user/{id} | GET | user page |
| /user/{id} | PATCH/PUT | update user |
| /user/{id}/orders | GET | display user client orders |
| /user/{id}/orders/{id} | GET | display an order for an user |
| /user?role=crafter | GET | display all crafters |
| /products | GET | products list |
| /products | POST | products list |
| /products/{id} | GET | single product page |
| /products/{id} | PATCH | single product page |
| /products?params=value | GET | params product |
| /crafters | GET | list all crafters |
| /crafters | POST | create crafter page |
| /crafters/{id} | GET | get an crafter |
| /crafters/{id} | PATCH/PUT | update crafter page |
| /categories | POST | create a category |
| /categories | GET | list all categories |
| /categories/{id} | PATCH/PUT | update a category |
| /materials | POST | create a material |
| /materials | GET | list all materials |
| /materials/{id} | PATCH/PUT | update a material |
| /users/{id}/cart | POST | add element to cart |
| /users/{id}/cart | GET | display user cart |
| /order | POST | create an order |
| /order/{id} | GET | display the order |
| /order/{id} | PATCH/PUT | edit an order |
| /address | POST | create an address |
| /address/{id} | PATCH/PUT | edit an address |
| /address/{id} | DELETE | delete an address |
| /images?id=model= | POST | insert an image |
| /images?id=model= | GET | find images |
| /images?image-id= | DELETE | delete an image |

#### à voir ?? :
un endpoint pour lister les users pour l'admin ?

### Authorization
| Autorization | Admin | Crafter | Customer | Visitor |
| ---- | ---- | ---- | ---- | ---- |
| Display products | x | x | x | x |
| Display crafters | x | x | x | x |
| Add product to cart | x | x | x | x |
| Display own cart | x | x | x | x |
| Edit cart | x | x | x | x |
| Validate cart | x | x | x |  |
| Display register page | x | x | x | x |
| Display login page | x | x | x | x |
| Dispay&edit profile page | x | x | x |  |
| Display order history | x | x | x |  |
| Cancel current order | x | x | x |  |
| Edit crafter page | x | x |  |  |
| Create&Edit a product | x | x |  |  |
| Display own past orders | x | x |  |  |
| Validate or deny a product | x |  |  |  |
| Manage  order status | x |  |  |  |
### Fonctionalités 
Sur demande ?
Plusieurs theme ?
## Ressources
#### Unit test:
https://auth0.com/blog/testing-laravel-apis-with-phpunit/
https://phpunit.de/documentation.html
#### Pattern:
repository: https://www.atrakeur.com/blog/web/laravel-et-pattern-repository/
https://medium.com/@sliusarchyn/service-layer-in-laravel-use-it-ae861fb0f124

## DIAGRAM
![image](https://github.com/MarcBoillot/laravelProject/assets/133685807/af03d54d-07b8-4a1e-9d83-b2ac816c809b)



