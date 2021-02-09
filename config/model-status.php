<?php

return [
    /**
     * When using the "HasStatuses" trait from this package, we need to know which
     * Eloquent model should be used to retrieve your statuses. Of course, it
     * is often just the "Status" model but you may use whatever you like.
     *
     * The model you want to use as a Status model needs to extend the
     * `Fabpl\ModelStatus\Models\Status` model.
     */
    'model' => Fabpl\ModelStatus\Models\Status::class,

    /**
     * When using the "HasStatuses" trait from this package, we need to know which
     * table should be used to retrieve your statuses. We have chosen a basic
     * default value but you may easily change it to any table you like.
     */
    'table_name' => 'statuses',
];
