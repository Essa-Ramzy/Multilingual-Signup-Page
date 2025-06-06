<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Validation Language Lines (Arabic)
  |--------------------------------------------------------------------------
  |
  | The following language lines contain the default error messages used by
  | the validator class. Some of these rules have multiple versions such
  | as the size rules. Feel free to tweak each of these messages here.
  |
  */

  'accepted' => 'يجب قبول :attribute.',
  'accepted_if' => 'يجب قبول :attribute عندما يكون :other هو :value.',
  'active_url' => 'حقل :attribute يجب أن يكون عنوان URL صالح.',
  'after' => 'حقل :attribute يجب أن يكون تاريخًا بعد :date.',
  'after_or_equal' => 'حقل :attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
  'alpha' => 'حقل :attribute يجب أن يحتوي على أحرف فقط.',
  'alpha_dash' => 'حقل :attribute يجب أن يحتوي على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
  'alpha_num' => 'حقل :attribute يجب أن يحتوي على أحرف وأرقام فقط.',
  'any_of' => 'حقل :attribute غير صالح.',
  'array' => 'حقل :attribute يجب أن يكون مصفوفة.',
  'ascii' => 'حقل :attribute يجب أن يحتوي فقط على أحرف أبجدية رقمية ورموز أحادية البايت.',
  'before' => 'حقل :attribute يجب أن يكون تاريخًا قبل :date.',
  'before_or_equal' => 'حقل :attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
  'between' => [
    'array' => 'حقل :attribute يجب أن يحتوي بين :min و :max عنصر.',
    'file' => 'حقل :attribute يجب أن يكون بين :min و :max كيلوبايت.',
    'numeric' => 'حقل :attribute يجب أن يكون بين :min و :max.',
    'string' => 'حقل :attribute يجب أن يكون بين :min و :max حرف.',
  ],
  'boolean' => 'حقل :attribute يجب أن يكون صح أو خطأ.',
  'can' => 'حقل :attribute يحتوي على قيمة غير مصرح بها.',
  'confirmed' => 'تأكيد حقل :attribute غير متطابق.',
  'contains' => 'حقل :attribute يفتقد إلى قيمة مطلوبة.',
  'current_password' => 'كلمة المرور غير صحيحة.',
  'date' => 'حقل :attribute يجب أن يكون تاريخًا صالحًا.',
  'date_equals' => 'حقل :attribute يجب أن يكون تاريخًا يساوي :date.',
  'date_format' => 'حقل :attribute يجب أن يطابق الصيغة :format.',
  'decimal' => 'حقل :attribute يجب أن يحتوي على :decimal منزلة عشرية.',
  'declined' => 'يجب رفض حقل :attribute.',
  'declined_if' => 'يجب رفض حقل :attribute عندما يكون :other هو :value.',
  'different' => 'حقل :attribute و :other يجب أن يكونا مختلفين.',
  'digits' => 'حقل :attribute يجب أن يكون :digits رقمًا.',
  'digits_between' => 'حقل :attribute يجب أن يكون بين :min و :max رقمًا.',
  'dimensions' => 'حقل :attribute يحتوي على أبعاد صورة غير صالحة.',
  'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
  'doesnt_end_with' => 'حقل :attribute يجب ألا ينتهي بأحد القيم التالية: :values.',
  'doesnt_start_with' => 'حقل :attribute يجب ألا يبدأ بأحد القيم التالية: :values.',
  'email' => 'حقل :attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
  'ends_with' => 'حقل :attribute يجب أن ينتهي بأحد القيم التالية: :values.',
  'enum' => 'القيمة المحددة لـ :attribute غير صالحة.',
  'exists' => 'القيمة المحددة لـ :attribute غير صالحة.',
  'extensions' => 'حقل :attribute يجب أن يحتوي على أحد الامتدادات التالية: :values.',
  'file' => 'حقل :attribute يجب أن يكون ملفًا.',
  'filled' => 'حقل :attribute يجب أن يحتوي على قيمة.',
  'gt' => [
    'array' => 'حقل :attribute يجب أن يحتوي على أكثر من :value عنصر.',
    'file' => 'حقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
    'numeric' => 'حقل :attribute يجب أن يكون أكبر من :value.',
    'string' => 'حقل :attribute يجب أن يكون أكبر من :value حرف.',
  ],
  'gte' => [
    'array' => 'حقل :attribute يجب أن يحتوي على :value عنصر أو أكثر.',
    'file' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
    'numeric' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value.',
    'string' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value حرف.',
  ],
  'hex_color' => 'حقل :attribute يجب أن يكون لون سداسي عشري صالح.',
  'image' => 'حقل :attribute يجب أن يكون صورة.',
  'in' => 'القيمة المحددة لـ :attribute غير صالحة.',
  'in_array' => 'حقل :attribute يجب أن يكون موجودًا في :other.',
  'integer' => 'حقل :attribute يجب أن يكون عددًا صحيحًا.',
  'ip' => 'حقل :attribute يجب أن يكون عنوان IP صالح.',
  'ipv4' => 'حقل :attribute يجب أن يكون عنوان IPv4 صالح.',
  'ipv6' => 'حقل :attribute يجب أن يكون عنوان IPv6 صالح.',
  'json' => 'حقل :attribute يجب أن يكون نص JSON صالح.',
  'list' => 'حقل :attribute يجب أن يكون قائمة.',
  'lowercase' => 'حقل :attribute يجب أن يكون بأحرف صغيرة.',
  'lt' => [
    'array' => 'حقل :attribute يجب أن يحتوي على أقل من :value عنصر.',
    'file' => 'حقل :attribute يجب أن يكون أقل من :value كيلوبايت.',
    'numeric' => 'حقل :attribute يجب أن يكون أقل من :value.',
    'string' => 'حقل :attribute يجب أن يكون أقل من :value حرف.',
  ],
  'lte' => [
    'array' => 'حقل :attribute يجب ألا يحتوي على أكثر من :value عنصر.',
    'file' => 'حقل :attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
    'numeric' => 'حقل :attribute يجب أن يكون أقل من أو يساوي :value.',
    'string' => 'حقل :attribute يجب أن يكون أقل من أو يساوي :value حرف.',
  ],
  'mac_address' => 'حقل :attribute يجب أن يكون عنوان MAC صالح.',
  'max' => [
    'array' => 'حقل :attribute يجب ألا يحتوي على أكثر من :max عنصر.',
    'file' => 'حقل :attribute يجب ألا يتجاوز :max كيلوبايت.',
    'numeric' => 'حقل :attribute يجب ألا يتجاوز :max.',
    'string' => 'حقل :attribute يجب ألا يتجاوز :max حرف.',
  ],
  'max_digits' => 'حقل :attribute يجب ألا يحتوي على أكثر من :max رقم.',
  'mimes' => 'حقل :attribute يجب أن يكون ملفًا من نوع: :values.',
  'mimetypes' => 'حقل :attribute يجب أن يكون ملفًا من نوع: :values.',
  'min' => [
    'array' => 'حقل :attribute يجب أن يحتوي على الأقل :min عنصر.',
    'file' => 'حقل :attribute يجب أن يكون على الأقل :min كيلوبايت.',
    'numeric' => 'حقل :attribute يجب أن يكون على الأقل :min.',
    'string' => 'حقل :attribute يجب أن يكون على الأقل :min حرف.',
  ],
  'min_digits' => 'حقل :attribute يجب أن يحتوي على الأقل :min رقم.',
  'missing' => 'حقل :attribute يجب أن يكون مفقودًا.',
  'missing_if' => 'حقل :attribute يجب أن يكون مفقودًا عندما يكون :other هو :value.',
  'missing_unless' => 'حقل :attribute يجب أن يكون مفقودًا ما لم يكن :other هو :value.',
  'missing_with' => 'حقل :attribute يجب أن يكون مفقودًا عندما يكون :values موجودًا.',
  'missing_with_all' => 'حقل :attribute يجب أن يكون مفقودًا عندما تكون :values موجودة.',
  'multiple_of' => 'حقل :attribute يجب أن يكون مضاعفًا للقيمة :value.',
  'not_in' => 'القيمة المحددة لـ :attribute غير صالحة.',
  'not_regex' => 'صيغة حقل :attribute غير صالحة.',
  'numeric' => 'حقل :attribute يجب أن يكون رقمًا.',
  'password' => [
    'letters' => 'حقل :attribute يجب أن يحتوي على حرف واحد على الأقل.',
    'mixed' => 'حقل :attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
    'numbers' => 'حقل :attribute يجب أن يحتوي على رقم واحد على الأقل.',
    'symbols' => 'حقل :attribute يجب أن يحتوي على رمز واحد على الأقل.',
    'uncompromised' => 'القيمة المدخلة لـ :attribute ظهرت في تسريب بيانات. الرجاء اختيار :attribute مختلف.',
  ],
  'present' => 'حقل :attribute يجب أن يكون موجودًا.',
  'present_if' => 'حقل :attribute يجب أن يكون موجودًا عندما يكون :other هو :value.',
  'present_unless' => 'حقل :attribute يجب أن يكون موجودًا ما لم يكن :other هو :value.',
  'present_with' => 'حقل :attribute يجب أن يكون موجودًا عندما يكون :values موجودًا.',
  'present_with_all' => 'حقل :attribute يجب أن يكون موجودًا عندما تكون :values موجودة.',
  'prohibited' => 'حقل :attribute محظور.',
  'prohibited_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
  'prohibited_if_accepted' => 'حقل :attribute محظور عندما يتم قبول :other.',
  'prohibited_if_declined' => 'حقل :attribute محظور عندما يتم رفض :other.',
  'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other ضمن :values.',
  'prohibits' => 'حقل :attribute يمنع وجود :other.',
  'regex' => 'صيغة حقل :attribute غير صالحة.',
  'required' => 'حقل :attribute مطلوب.',
  'required_array_keys' => 'حقل :attribute يجب أن يحتوي على إدخالات لـ: :values.',
  'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
  'required_if_accepted' => 'حقل :attribute مطلوب عندما يتم قبول :other.',
  'required_if_declined' => 'حقل :attribute مطلوب عندما يتم رفض :other.',
  'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other ضمن :values.',
  'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
  'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
  'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
  'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
  'same' => 'حقل :attribute و :other يجب أن يتطابقا.',
  'size' => [
    'array' => 'حقل :attribute يجب أن يحتوي على :size عنصر.',
    'file' => 'حقل :attribute يجب أن يكون :size كيلوبايت.',
    'numeric' => 'حقل :attribute يجب أن يكون :size.',
    'string' => 'حقل :attribute يجب أن يكون :size حرف.',
  ],
  'starts_with' => 'حقل :attribute يجب أن يبدأ بأحد القيم التالية: :values.',
  'string' => 'حقل :attribute يجب أن يكون نصًا.',
  'timezone' => 'حقل :attribute يجب أن يكون منطقة زمنية صالحة.',
  'unique' => 'القيمة المدخلة لـ :attribute مستخدمة بالفعل.',
  'uploaded' => 'فشل تحميل :attribute.',
  'uppercase' => 'حقل :attribute يجب أن يكون بأحرف كبيرة.',
  'url' => 'حقل :attribute يجب أن يكون عنوان URL صالح.',
  'ulid' => 'حقل :attribute يجب أن يكون ULID صالح.',
  'uuid' => 'حقل :attribute يجب أن يكون UUID صالح.',

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | Here you may specify custom validation messages for attributes using the
  | convention "attribute.rule" to name the lines. This makes it quick to
  | specify a specific custom language line for a given attribute rule.
  |
  */

  'custom' => [
    'password' => [
      'regex' => 'يجب أن تحتوي كلمة المرور على حرف واحد على الأقل ورقم واحد ورمز خاص واحد.',
    ],
    'password_confirmation' => [
      'same' => 'كلمة المرور وتأكيدها غير متطابقين.',
    ],
    'user_image' => [
      'required' => 'يرجى تحميل صورة للملف الشخصي.',
      'max' => 'حجم الملف كبير جدًا. الحد الأقصى هو :max ميجابايت.',
    ],
    'user_name' => [
      'regex' => 'يجب أن يكون اسم المستخدم من 4-20 حرفًا ويحتوي فقط على أحرف وأرقام وشرطات سفلية.',
    ],
    'phone' => [
      'regex' => 'يرجى إدخال رقم هاتف صالح.',
    ],
    'whatsapp' => [
      'regex' => 'يرجى إدخال رقم واتساب صالح.',
      'not_validated' => 'يرجى التحقق من رقم الواتساب الخاص بك قبل التسجيل.',
    ],
  ],

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Attributes
  |--------------------------------------------------------------------------
  |
  | The following language lines are used to swap our attribute placeholder
  | with something more reader friendly such as "E-Mail Address" instead
  | of "email". This simply helps us make our message more expressive.
  |
  */

  'attributes' => [
    'full_name' => 'الاسم الكامل',
    'user_name' => 'اسم المستخدم',
    'email' => 'البريد الإلكتروني',
    'phone' => 'رقم الهاتف',
    'whatsapp' => 'رقم الواتساب',
    'address' => 'العنوان',
    'password' => 'كلمة المرور',
    'password_confirmation' => 'تأكيد كلمة المرور',
    'user_image' => 'صورة الملف الشخصي',
    'agree_terms' => 'الموافقة على الشروط والأحكام',
  ],

];
