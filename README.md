# Custom form finisher "SaveRepeatableToDatabase"
TYPO3 EXT:form save to database finisher for repeatable data

The TYPO3 extension allows to save repeatable data into database tables like the SaveToDatabaseFinisher from core. To create forms with repeatable data in TYPO3 v8 LTS, you can use the repeatable_form_elements extension from TRITUM https://github.com/tritum/repeatable_form_elements

## Usage
The finisher is used like the SaveToDatabase finisher from TYPO3 Core. It only introduce a new option called "repeat", if it isn't set, the core code path is used. If you set it to the identifier of a repeating container it will use this one to save data repeatingly to the table.

## Example

```
finishers:
  -
    options:
      -
        table: fe_users
        mode: insert
        databaseColumnMappings:
          pid:
            value: '1'
          crdate:
            value: '{__currentTimestamp}'
          tstamp:
            value: '{__currentTimestamp}'
          tx_extbase_type:
            value: Tx_Extbase_Domain_Model_FrontendUser
        elements:
          username:
            mapOnDatabaseColumn: username
          email:
            mapOnDatabaseColumn: email
      -
        table: fe_users_locations
        mode: insert
        repeat: locationcontainer
        databaseColumnMappings:
          pid:
            value: '1'
          crdate:
            value: '{__currentTimestamp}'
          tstamp:
            value: '{__currentTimestamp}'
          fe_user:
            value: '{SaveRepeatableToDatabase.insertedUids.1}'
        elements:
          locationstreet:
            mapOnDatabaseColumn: street
          locationplace:
            mapOnDatabaseColumn: place
          locationzip:
            mapOnDatabaseColumn: zip
          locationcity:
            mapOnDatabaseColumn: city
      -
        table: fe_users
        mode: update
        whereClause:
          uid: '{SaveRepeatableToDatabase.insertedUids.0}'
        databaseColumnMappings:
          locations:
            value: '{SaveRepeatableToDatabase.countInserts.1}'
    identifier: SaveRepeatableToDatabase
```

## Hint

This implementation won't work with nested repeatable form elements.
