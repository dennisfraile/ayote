<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
        Bienvenido a esta aplicacion de pago!
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                class="w-8 h-8 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 
                0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Enlaces de pago</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Listado de enlaces de pago para poder realizar transacciones
            </div>
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div class="ml-1 text-indigo-500">
                        <a href="{{ route('enlacepago.index') }}" class="mt-3 flex items-center bg-blue-500 hover:bg-blue-400 
                                border-b-4 border-blue-700 hover:border-blue-500 text-white text-center py-2 px-4 rounded">
                            Seleccionar enlaces de pago 
                        </a>
                    </div>
            </div>
            
        </div>
    </div>

    @can('user.transaccion.dashboard')
        <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                    class="w-8 h-8 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25
                     2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 
                     0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 
                     2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 
                     8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 
                     1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 
                     3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Dashboard Transaccion</div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    Modulo para la gestion de todas las transacciones 
                </div>
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div class="ml-1 text-indigo-500">
                            <a href="{{ route('transacciones') }}" class="mt-3 flex items-center bg-blue-500 hover:bg-blue-400 
                                    border-b-4 border-blue-700 hover:border-blue-500 text-white text-center py-2 px-4 rounded">
                                Ir al Dashboard de Transaccion
                            </a>
                        </div>
                </div>
                
            </div>
        </div>
    @endcan

    @can('admin.user.index')
        <div class="p-6 border-t border-gray-200">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     class="w-8 h-8 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0
                     004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318
                     12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375
                     3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Gestion de usuario</div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    Modulo para la gestion de los usuarios 
                </div>
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div class="ml-1 text-indigo-500">
                        <a href="{{ route('users.index') }}" class="mt-3 flex items-center bg-blue-500 hover:bg-blue-400 
                            border-b-4 border-blue-700 hover:border-blue-500 text-white text-center py-2 px-4 rounded">
                            Ir al Dashboard de Usuarios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('admin.role.index')
        <div class="p-6 border-t border-gray-200 md:border-l">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     class="w-8 h-8 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25
                     2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 
                     19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789
                      6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                </svg>
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Gestion de Roles</div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    Modulo para la gestion de los roles de los usuarios            
                </div>
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div class="ml-1 text-indigo-500">
                        <a href="{{ route('roles.index') }}" class="mt-3 flex items-center bg-blue-500 hover:bg-blue-400 
                            border-b-4 border-blue-700 hover:border-blue-500 text-white text-center py-2 px-4 rounded">
                            Ir al Dashboard de Roles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>
