# 1. **LAN Boutique**

## 1.1. **Concepts**

### 1.1.1. Roles and previleges

| No  | Employee       | Manager                     | Customer                |
| --- | -------------- | --------------------------- | ----------------------- |
| 1   | Create order   | Create/update order         | Create customer account |
| 2   | Create payment | Create/update payment       | Create/update order     |
| 3   | History order  | Show report orders          | History order           |
| 4   | -              | Create/update menu          | -                       |
| 5   | -              | Create account for employee | -                       |
| 6   | -              | Set schedules               | -                       |
| 7   | -              | Add data employee           | -                       |
| 8   | -              | -                           | -                       |
|     |                |                             |                         |

## 1.2. **Database**

### 1.2.1. Table employees

|     | Name       | Type   |                                    |
| --- | ---------- | ------ | ---------------------------------- |
| PK  | **id**     | int    | Auto-increament                    |
|     | name       | string | Length(255)                        |
|     | photo      | string |                                    |
|     | start_date | string | Length(10), 'yyyy-mm-dd'           |
|     | end_date   | string | Length(10), 'yyyy-mm-dd', nullable |
|     | created_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss'  |
|     | updated_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss'  |

### 1.2.2. Table admins

|     | Name            | Type   |                                   |
| --- | --------------- | ------ | --------------------------------- |
| PK  | **id**          | int    | Auto-increament                   |
|     | username        | string | Length(64), unique                |
|     | password        | string | Length(64)                        |
| FK  | **employee_id** | int    |                                   |
| FK  | **role_id**     | int    |                                   |
|     | created_at      | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at      | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.3. Table users

|     | Name        | Type   |                                   |
| --- | ----------- | ------ | --------------------------------- |
| PK  | **id**      | int    | Auto-increament                   |
|     | name        | string | Length(255)                       |
|     | username    | string | Length(64), unique                |
|     | password    | string | Length(64)                        |
| FK  | **role_id** | int    |                                   |
|     | created_at  | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at  | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.4. Table user_session_logs

|     | Name        | Type   |                                   |
| --- | ----------- | ------ | --------------------------------- |
| PK  | **id**      | int    | Auto-increament                   |
|     | ip_address  | string | Length(64), nullable              |
|     | user_agent  | string | nullable                          |
| FK  | **user_id** | int    |                                   |
|     | created_at  | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.5. Table admin_session_logs

|     | Name         | Type   |                                   |
| --- | ------------ | ------ | --------------------------------- |
| PK  | **id**       | int    | Auto-increament                   |
|     | ip_address   | string | Length(64), nullable              |
|     | user_agent   | string | nullable                          |
| FK  | **admin_id** | int    |                                   |
|     | created_at   | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.6. Table roles

|     | Name       | Type   |                                   |
| --- | ---------- | ------ | --------------------------------- |
| PK  | **id**     | int    | Auto-increament                   |
|     | name       | string | Length(128)                       |
|     | code       | string | Length(128), unique               |
|     | created_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.7. Table privileges

|     | Name       | Type   |                                   |
| --- | ---------- | ------ | --------------------------------- |
| PK  | **id**     | int    | Auto-increament                   |
|     | name       | string | Length(128)                       |
|     | code       | string | Length(128), unique               |
|     | created_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.8. Table role_privilege

|     | Name             | Type   |                                   |
| --- | ---------------- | ------ | --------------------------------- |
| PK  | **id**           | int    | Auto-increament                   |
| FK  | **role_id**      | int    |                                   |
| FK  | **previlege_id** | int    |                                   |
|     | created_at       | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at       | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.9. Table categories

|     | Name       | Type   |                                   |
| --- | ---------- | ------ | --------------------------------- |
| PK  | **id**     | int    | Auto-increament                   |
|     | name       | string | Length(128)                       |
|     | code       | string | Length(128), unique               |
|     | created_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.10. Table products

|     | Name       | Type   |                                   |
| --- | ---------- | ------ | --------------------------------- |
| PK  | **id**     | int    | Auto-increament                   |
|     | name       | string | Length(255)                       |
|     | code       | string | Length(255), unique               |
|     | created_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.11. Table product_categories

|     | Name            | Type   |                                   |
| --- | --------------- | ------ | --------------------------------- |
| PK  | **id**          | int    | Auto-increament                   |
| FK  | **product_id**  | int    |                                   |
| FK  | **category_id** | int    |                                   |
|     | created_at      | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at      | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.12. Table product_variants

|     | Name           | Type   |                                   |
| --- | -------------- | ------ | --------------------------------- |
| PK  | **id**         | int    | Auto-increament                   |
|     | name           | string | Length(255)                       |
|     | code           | string | Length(255), unique               |
|     | price          | long   |                                   |
| FK  | **product_id** | int    |                                   |
|     | created_at     | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at     | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.12. Table product_detail

|     | Name                   | Type     |                                   |
| --- | ---------------------- | -------- | --------------------------------- |
| PK  | **id**                 | int      | Auto-increament                   |
|     | summary                | string   |                                   |
|     | description            | string   | nullable                          |
|     | tags                   | string[] | nullable                          |
|     | images                 | string[] | nullable                          |
|     | highlights             | string[] | nullable                          |
|     | colors                 | string[] | nullable                          |
|     | size                   | string[] | nullable                          |
| FK  | **product_id**         | int      |                                   |
| FK  | **product_variant_id** | int      |                                   |
|     | created_at             | string   | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at             | string   | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.13. Table materials

|     | Name       | Type     |                                   |
| --- | ---------- | -------- | --------------------------------- |
| PK  | **id**     | int      | Auto-increament                   |
|     | name       | string   | Length(255)                       |
|     | code       | string   | Length(255), unique               |
|     | images     | string[] |                                   |
|     | created_at | string   | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at | string   | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.14. Table product_materials

|     | Name                   | Type   |                                   |
| --- | ---------------------- | ------ | --------------------------------- |
| PK  | **id**                 | int    | Auto-increament                   |
| FK  | **product_variant_id** | int    |                                   |
| FK  | **material_id**        | int    |                                   |
|     | created_at             | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at             | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.15. Table orders

|     | Name          | Type   |                                           |
| --- | ------------- | ------ | ----------------------------------------- |
| PK  | **id**        | int    | Auto-increament                           |
|     | order_id      | string | Length(64), unique                        |
|     | amount        | int    |                                           |
|     | customer_name | string | Length(128)                               |
|     | status        | int    | 0=pending, 1=canceled, 2=progress, 3=done |
| FK  | **user_id**   | int    |                                           |
| FK  | **admin_id**  | int    | nullable                                  |
|     | created_at    | string | Length(20), 'yyyy-MM-dd HH:mm:ss'         |
|     | updated_at    | string | Length(20), 'yyyy-MM-dd HH:mm:ss'         |

### 1.2.16. Table order_logs

|     | Name           | Type   |                                         |
| --- | -------------- | ------ | --------------------------------------- |
| PK  | **id**         | int    | Auto-increament                         |
|     | amount         | int    |                                         |
|     | status         | int    | 0=pending, 2=progress, 3=done, 4=served |
| FK  | **product_id** | int    |                                         |
| FK  | **order_id**   | int    |                                         |
|     | created_at     | string | Length(20), 'yyyy-MM-dd HH:mm:ss'       |
|     | updated_at     | string | Length(20), 'yyyy-MM-dd HH:mm:ss'       |

### 1.2.17. Table order_payments

|     | Name         | Type   |                                   |
| --- | ------------ | ------ | --------------------------------- |
| PK  | **id**       | int    | Auto-increament                   |
| FK  | **admin_id** | int    |                                   |
| FK  | **order_id** | int    |                                   |
|     | created_at   | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at   | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.18. Table payment_services

|     | Name         | Type   |                                   |
| --- | ------------ | ------ | --------------------------------- |
| PK  | **id**       | int    | Auto-increament                   |
|     | name         | string | Lengh(32)                         |
|     | code         | string | Lengh(32), unique                 |
|     | is_available | int    |                                   |
|     | created_at   | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at   | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.19. Table payment_types

|     | Name                   | Type   |                                   |
| --- | ---------------------- | ------ | --------------------------------- |
| PK  | **id**                 | int    | Auto-increament                   |
|     | name                   | string | Lengh(32)                         |
|     | code                   | string | Lengh(32), unique                 |
|     | is_available           | int    |                                   |
| FK  | **payment_service_id** | int    |                                   |
|     | created_at             | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at             | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.20. Table payment_logs

|     | Name                 | Type   |                                   |
| --- | -------------------- | ------ | --------------------------------- |
| PK  | **id**               | int    | Auto-increament                   |
|     | amount               | int    |                                   |
|     | file_path            | string | nullable                          |
|     | status               | int    | 0=pending, 1=canceled, 3=paid     |
| FK  | **ref_id**           | int    |                                   |
| FK  | **payment_type_id**  | int    |                                   |
| FK  | **order_payment_id** | int    |                                   |
|     | created_at           | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at           | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.21. Table schedule_shift_types

|     | Name       | Type   |                                   |
| --- | ---------- | ------ | --------------------------------- |
| PK  | **id**     | int    | Auto-increament                   |
|     | name       | string | Length(128)                       |
|     | code       | string | Length(128), unique               |
|     | time_start | string | Length(8), 'HH:mm:ss'             |
|     | time_end   | string | Length(8), 'HH:mm:ss'             |
|     | created_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.22. Table employee_schedules

|     | Name                   | Type   |                                   |
| --- | ---------------------- | ------ | --------------------------------- |
| PK  | **id**                 | int    | Auto-increament                   |
|     | amount                 | int    |                                   |
|     | date_start             | string | Length(10), 'yyyy-MM-dd'          |
|     | date_end               | string | Length(10), 'yyyy-MM-dd'          |
| FK  | **admin_id**           | int    |                                   |
| FK  | **schedules_shift_id** | int    |                                   |
|     | created_at             | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at             | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |

### 1.2.23. Table attendance_logs

|     | Name                     | Type   |                                   |
| --- | ------------------------ | ------ | --------------------------------- |
| PK  | **id**                   | int    | Auto-increament                   |
|     | status                   | int    | 0=Late, 1=Permit, 2=OnTime        |
|     | attendance_time          | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
| FK  | **employee_schedule_id** | int    |                                   |
|     | created_at               | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
|     | updated_at               | string | Length(20), 'yyyy-MM-dd HH:mm:ss' |
