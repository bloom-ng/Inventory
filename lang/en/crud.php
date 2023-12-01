<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'departments' => [
        'name' => 'Departments',
        'index_title' => 'Departments List',
        'new_title' => 'New Department',
        'create_title' => 'Create Department',
        'edit_title' => 'Edit Department',
        'show_title' => 'Show Department',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
            'head' => 'Head',
        ],
    ],

    'items' => [
        'name' => 'Items',
        'index_title' => 'Items List',
        'new_title' => 'New Item',
        'create_title' => 'Create Item',
        'edit_title' => 'Edit Item',
        'show_title' => 'Show Item',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
            'unit_price' => 'Unit Price',
            'quantity' => 'Quantity',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'locations' => [
        'name' => 'Locations',
        'index_title' => 'Locations List',
        'new_title' => 'New Location',
        'create_title' => 'Create Location',
        'edit_title' => 'Edit Location',
        'show_title' => 'Show Location',
        'inputs' => [
            'id' => 'Id',
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'item_locations' => [
        'name' => 'Item Locations',
        'index_title' => 'ItemLocations List',
        'new_title' => 'New Item location',
        'create_title' => 'Create ItemLocation',
        'edit_title' => 'Edit ItemLocation',
        'show_title' => 'Show ItemLocation',
        'inputs' => [
            'item_id' => 'Item',
            'department_id' => 'Department',
            'location_id' => 'Location',
            'quantity' => 'Quantity',
            'description' => 'Description',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
