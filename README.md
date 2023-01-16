# Symfony Application Using Doctrine Extensions

The project demonstrates the features of [DoctrineExtensions](https://github.com/doctrine-extensions/DoctrineExtensions) integrated with Symfony via the [StofDoctrineExtensionsBundle](https://github.com/stof/StofDoctrineExtensionsBundle).  

## How to Install
```bash
make instal
```

DoctrineExtensions has the following features:  
<b>Blameable</b> - user in `createdBy`, `updatedBy`  
<b>Loggable</b> - multiple versions of entity data  
<b>Sluggable</b> - processing this kind of URL `/articles/how-to-install`. Slug is `how-to-install`  
<b>Timestampable</b> - date and time in `createdAt`, `updatedAt`  
<b>Translatable</b> - entity translations  
<b>Tree</b> - creates a tree structure (an entity has an ancestor and children)  
<b>IpTraceable</b> - user ip-address in `createdFromIp`, `updatedFromIp`  
<b>SoftDeleteable</b> - when deleting the entity is not deleted, but the deletion time is stored in `deletedAt`  
<b>Sortable</b> - manual sorting of entities by setting entity position  
<b>Uploadable</b> - uploading and storing files
