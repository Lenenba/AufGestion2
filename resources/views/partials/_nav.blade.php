<nav class="flex items-center justify-between">
                <div class="flex items-end mb-2">
                    <img src="/images/logo.png" alt="logo AUF" class="h-10 sm:ml-0 ">  
                    
                    <ul class=" flex text-xs lg:text-sm lg:ml-20 ml-6 text-gray-600 ">
                    <a href="/"><li>
                            <div class="flex mx-4 items-center hover:text-gray-400 focus:text-gray-100 ">    
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-600 ">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                </svg>
                                DASHBOARD
                           </div>
                        </li> </a><span class="text-gray-600"> | </span>
                        <li>
                            
                            <dropdown>

                                <template v-slot:trigger>

                                    <button class="focus:no-underline focus:outline-none">
                                        <div class="flex mx-4 items-center hover:text-gray-400 focus:text-gray-100 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-600 ">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        FOURNISSEURS
                                        </div> 
                                    </button>   

                                </template>

                                <a href="/supplier" class="block text-xs text-gray-600 no-underline hover:bg-gray-500 hover:text-white leading-loose px-5">RECHERCHE</a>
                                <a href="/supplier/create" class="block text-xs text-gray-600 no-underline hover:bg-gray-500 hover:text-white leading-loose px-5">NOUVEL DEMANDE</a>
                                <a href="#" class="block text-xs text-gray-600 no-underline hover:bg-gray-500 hover:text-white leading-loose px-5">SUIVIS DEMANDE</a>
                                <a href="#" class="block text-xs text-gray-600 no-underline hover:bg-gray-500 hover:text-white leading-loose px-5">LISTE COMPTABLE</a>

                            </dropdown>    

                        </li> <span class="text-gray-600"> | </span>
                        <li>
                            <div class="flex ml-4 items-center hover:text-gray-400 focus:text-gray-100 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-600 ">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                </svg>
                              PROJETS
                            </div>    
                        </li>
                    </ul>
                </div>  
                <div class="flex items-center overflow-hidden">
                    <div class="flex mr-5 ">
                        <div class="relative">
                            <span class="relative inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 mx-2 text-gray-600  hover:text-gray-400 focus:text-gray-100">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                                <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-0">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                                <span class="relative inline-flex text-xs rounded-full h-3 w-3 bg-pink-500"></span>
                                </span>
                            </span>
                        </div>
                        <div>
                            <span class="relative inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 mx-2 text-gray-600  hover:text-gray-400 focus:text-gray-100">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                                    <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500"></span>
                                    </span>
                                </span>
                        </div>
                        
                    </div> 
                        <span class="text-gray-600"> | </span>

                            <dropdown align="right">

                                <template v-slot:trigger>
                                
                                    <button class="flex items-center ml-4 focus:no-underline focus:outline-none">
                                        <h6 class="text-gray-600 hover:text-gray-400 focus:text-gray-100 text-sm">Jules BILITIK</h6>
                                        <img src="https://fr.gravatar.com/avatar/" alt="logo AUF" class="w-10 ml-3 rounded rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">  
                                    </button>

                                </template>

                                <a href="#" class="block text-xs text-gray-600 no-underline hover:bg-gray-500 hover:text-white leading-loose px-5">NOTIFICATION</a>
                                <a href="#" class="block text-xs text-gray-600 no-underline hover:bg-gray-500 hover:text-white leading-loose px-5">PROFIL</a>
                                <a href="#" class="block text-xs text-gray-600 no-underline hover:bg-gray-500 hover:text-white leading-loose px-5">DECONNEXION</a>

                            </dropdown>
                            
                </div>
            </nav>