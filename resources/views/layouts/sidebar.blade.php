<div class="sidebar hidden sm:block w-0 sm:w-2/12 bg-gray-200 h-screen shadow fixed top-0 left-0 bottom-0 z-40 overflow-y-auto">
    <div class="mb-6 mt-20 px-6">
        <a href="{{ route('home') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current feather feather-home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
            <span class="ml-2 text-sm font-semibold">احصائيات</span>
        </a>
        <a href="{{ route('teacher.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
            <span class="ml-2 text-sm font-semibold">الاساتذة</span>
        </a>
        @role('BrayatiAdmin')
        <a href="{{ route('student.b') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-graduate" class="svg-inline--fa fa-user-graduate fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"></path></svg>
            <span class="ml-2 text-sm font-semibold">طلاب برايتي</span>
        </a>
        <a href="{{ route('course.b') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-book" viewBox="0 0 16 16"> <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/> </svg>
            <span class="ml-2 text-sm font-semibold">دبلوم ودورات برايتي</span>
        </a>
        <a href="{{ route('paymentpays.createreport' , 'b') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">تقارير مالية</span>
            
        </a>
                </a>
                <a href="{{ route('student.paymentscollectdate') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">الدفعات المستحقة برايتي </span>
        </a>
                                <a href="{{ route('student.firstpayment') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">الدفعات غير المستكملة  </span>
        </a>
        @endrole
        @role('Admin')
        <a href="{{ route('student.ld') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-graduate" class="svg-inline--fa fa-user-graduate fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"></path></svg>
            <span class="ml-2 text-sm font-semibold">طلاب لاوان</span>
        </a>
        <a href="{{ route('student.b') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-graduate" class="svg-inline--fa fa-user-graduate fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"></path></svg>
            <span class="ml-2 text-sm font-semibold">طلاب برايتي</span>
        </a>

        <a href="{{ route('course.ld') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-book" viewBox="0 0 16 16"> <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/> </svg>
            <span class="ml-2 text-sm font-semibold">دبلوم ودورات لاوان</span>
        </a>
        <a href="{{ route('course.b') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-book" viewBox="0 0 16 16"> <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/> </svg>
            <span class="ml-2 text-sm font-semibold">دبلوم ودورات برايتي</span>
        </a>
        <a href="{{ route('paymentpays.createreport' , 'all') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">تقارير مالية</span>
        </a>
        <a href="{{ route('course.finished') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">الدورات المنتهية</span>
        </a>
        <a href="{{ route('student.cancel') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">الطلاب المنسحبين</span>
        </a>
        <a href="{{ route('student.paymentscollect') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold"> الدفعات المستحقة لاوان</span>
        </a>
                <a href="{{ route('student.lawanbrayati') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold"> طلاب لاوان في برايتي</span>
        </a>
                <a href="{{ route('student.paymentscollectdate') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">الدفعات المستحقة برايتي </span>
        </a>
                        <a href="{{ route('student.firstpayment') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">الدفعات غير المستكملة  </span>
        </a>
        @endrole
        @role('LawanAdmin')
        <a href="{{ route('student.ld') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-graduate" class="svg-inline--fa fa-user-graduate fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"></path></svg>
            <span class="ml-2 text-sm font-semibold">طلاب لاوان</span>
        </a>
        <a href="{{ route('course.ld') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-book" viewBox="0 0 16 16"> <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/> </svg>
            <span class="ml-2 text-sm font-semibold">دبلوم ودورات لاوان</span>
        </a>
                <a href="{{ route('paymentpays.createreport' , 'ld') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">تقارير مالية</span>
        </a>
                <a href="{{ route('student.paymentscollect') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16"> <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/> <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/> </svg>
            <span class="ml-2 text-sm font-semibold">الدفعات المستحقة </span>
        </a>
        @endrole
    </div>
</div>
