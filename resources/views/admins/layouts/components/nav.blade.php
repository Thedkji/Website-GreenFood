<style>
    .app-menu.navbar-menu {
        overflow-y: scroll;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */
    }

    .app-menu.navbar-menu::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari */
    }
</style>

<div class="app-menu navbar-menu " style="background-color: #252323">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ env('VIEW_ADMIN') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ env('VIEW_ADMIN') }}/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ env('VIEW_ADMIN') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <a href="{{ route('client.home') }}" class="navbar-brand">
                    <h1 class="text-primary display-7" style="color:#81C408 !important">GreenFood</h1>
                </a>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <!-- start Dashboard Menu -->
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-line"></i> <span data-key="t-dashboards">Bảng điều khiển</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard" class="nav-link" data-key="t-analytics">
                                    Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects">
                                    Projects </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-job.html" class="nav-link" data-key="t-job">Job</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    Calendar
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-calendar.html" class="nav-link" data-key="t-main-calender">
                                                Main Calender </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-calendar-month-grid.html" class="nav-link"
                                                data-key="t-month-grid"> Month Grid </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Chat </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Email
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-mailbox.html" class="nav-link" data-key="t-mailbox">
                                                Mailbox </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebaremailTemplates" class="nav-link"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="sidebaremailTemplates" data-key="t-email-templates">
                                                Email Templates
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-email-basic.html" class="nav-link"
                                                            data-key="t-basic-action"> Basic Action </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-email-ecommerce.html" class="nav-link"
                                                            data-key="t-ecommerce-action"> Ecommerce Action
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarEcommerce"
                                    data-key="t-ecommerce">
                                    Ecommerce
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-products.html" class="nav-link"
                                                data-key="t-products"> Products </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-product-details.html" class="nav-link"
                                                data-key="t-product-Details"> Product Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-add-product.html" class="nav-link"
                                                data-key="t-create-product"> Create Product </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-orders.html" class="nav-link"
                                                data-key="t-orders">
                                                Orders </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-order-details.html" class="nav-link"
                                                data-key="t-order-details"> Order Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-customers.html" class="nav-link"
                                                data-key="t-customers"> Customers </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-cart.html" class="nav-link"
                                                data-key="t-shopping-cart"> Shopping Cart </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-checkout.html" class="nav-link"
                                                data-key="t-checkout"> Checkout </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-sellers.html" class="nav-link"
                                                data-key="t-sellers">
                                                Sellers </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-ecommerce-seller-details.html" class="nav-link"
                                                data-key="t-sellers-details"> Seller Details </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProjects" data-key="t-projects">
                                    Projects
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-projects-list.html" class="nav-link" data-key="t-list">
                                                List
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-overview.html" class="nav-link"
                                                data-key="t-overview"> Overview </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-create.html" class="nav-link"
                                                data-key="t-create-project"> Create Project </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTasks" data-key="t-tasks"> Tasks
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tasks-kanban.html" class="nav-link"
                                                data-key="t-kanbanboard">
                                                Kanban Board </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-list-view.html" class="nav-link"
                                                data-key="t-list-view">
                                                List View </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-details.html" class="nav-link"
                                                data-key="t-task-details"> Task Details </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCRM" data-key="t-crm"> CRM
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crm-contacts.html" class="nav-link" data-key="t-contacts">
                                                Contacts </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-companies.html" class="nav-link"
                                                data-key="t-companies">
                                                Companies </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-deals.html" class="nav-link" data-key="t-deals"> Deals
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-leads.html" class="nav-link" data-key="t-leads"> Leads
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto" data-key="t-crypto"> Crypto
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crypto-transactions.html" class="nav-link"
                                                data-key="t-transactions"> Transactions </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-buy-sell.html" class="nav-link"
                                                data-key="t-buy-sell">
                                                Buy & Sell </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-orders.html" class="nav-link" data-key="t-orders">
                                                Orders </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-wallet.html" class="nav-link"
                                                data-key="t-my-wallet">
                                                My Wallet </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-ico.html" class="nav-link" data-key="t-ico-list">
                                                ICO
                                                List </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-kyc.html" class="nav-link"
                                                data-key="t-kyc-application"> KYC Application </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarInvoices" data-key="t-invoices">
                                    Invoices
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-invoices-list.html" class="nav-link"
                                                data-key="t-list-view">
                                                List View </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-details.html" class="nav-link"
                                                data-key="t-details">
                                                Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-create.html" class="nav-link"
                                                data-key="t-create-invoice"> Create Invoice </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets">
                                    Support Tickets
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list.html" class="nav-link" data-key="t-list-view">
                                                List View </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tickets-details.html" class="nav-link"
                                                data-key="t-ticket-details"> Ticket Details </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarnft" data-key="t-nft-marketplace">
                                    NFT Marketplace
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarnft">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-nft-marketplace.html" class="nav-link"
                                                data-key="t-marketplace"> Marketplace </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-explore.html" class="nav-link"
                                                data-key="t-explore-now"> Explore Now </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-auction.html" class="nav-link"
                                                data-key="t-live-auction"> Live Auction </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-item-details.html" class="nav-link"
                                                data-key="t-item-details"> Item Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-collections.html" class="nav-link"
                                                data-key="t-collections"> Collections </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-creators.html" class="nav-link" data-key="t-creators">
                                                Creators </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-ranking.html" class="nav-link" data-key="t-ranking">
                                                Ranking </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-wallet.html" class="nav-link"
                                                data-key="t-wallet-connect"> Wallet Connect </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-create.html" class="nav-link" data-key="t-create-nft">
                                                Create NFT </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="apps-file-manager.html" class="nav-link"> <span
                                        data-key="t-file-manager">File Manager</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-todo.html" class="nav-link"> <span data-key="t-to-do">To
                                        Do</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarjobs" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarjobs" data-key="t-jobs"> Jobs</a>
                                <div class="collapse menu-dropdown" id="sidebarjobs">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-job-statistics.html" class="nav-link"
                                                data-key="t-statistics"> Statistics </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarJoblists" class="nav-link" data-bs-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="sidebarJoblists"
                                                data-key="t-job-lists">
                                                Job Lists
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarJoblists">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-job-lists.html" class="nav-link"
                                                            data-key="t-list"> List
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-job-grid-lists.html" class="nav-link"
                                                            data-key="t-grid"> Grid </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-job-details.html" class="nav-link"
                                                            data-key="t-overview"> Overview</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCandidatelists" class="nav-link"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="sidebarCandidatelists" data-key="t-candidate-lists">
                                                Candidate Lists
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCandidatelists">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-job-candidate-lists.html" class="nav-link"
                                                            data-key="t-list-view"> List
                                                            View
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-job-candidate-grid.html" class="nav-link"
                                                            data-key="t-grid-view"> Grid
                                                            View</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-application.html" class="nav-link"
                                                data-key="t-application"> Application </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-new.html" class="nav-link" data-key="t-new-job"> New
                                                Job </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-companies-lists.html" class="nav-link"
                                                data-key="t-companies-list"> Companies List </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-job-categories.html" class="nav-link"
                                                data-key="t-job-categories"> Job Categories</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="apps-api-key.html" class="nav-link" data-key="t-api-key">API
                                    Key</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end Dashboard Menu -->



                {{-- danh mục sản phẩm --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCategories" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCategories">
                        <i class="ri-file-list-3-line"></i>
                        <span data-key="t-landing">Danh mục</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCategories">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link" role="button"
                                aria-controls="sidebarCategories" data-key="t-calender">
                                Danh sách danh mục
                            </a>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.categories.create') }}" class="nav-link" role="button"
                                aria-controls="sidebarCategories" data-key="t-calender">
                                Thêm danh mục
                            </a>
                        </ul>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class=" ri-keyboard-box-line"></i> <span data-key="t-pages">Sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index', ['statusProduct' => 'allPro']) }}"
                                    class="nav-link" data-key="t-starter">
                                    Danh sách sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}" class="nav-link" data-key="t-team">
                                    Thêm mới sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Biến thể</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <div class="">
                                <a href="{{ route('admin.variants.index') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    Danh sách biến thể
                                </a>

                                <a href="{{ route('admin.variants.create') }}" class="nav-link" role="button"
                                    aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    Thêm mới biến thể
                                </a>
                            </div>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarOrders">
                        <i class="ri-shopping-cart-line"></i>
                        <span data-key="t-landing">Đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarOrders">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.orders.showOder') }}" class="nav-link" role="button"
                                aria-controls="sidebarOrderParent" data-key="t-calender">
                                Danh sách đơn hàng
                            </a>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarComment" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarComment">
                        <i class="ri-chat-1-line"></i> <span data-key="t-forms">Bình luận</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarComment">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.comments.comment') }}" class="nav-link"
                                    data-key="t-basic-elements">Danh sách bình luận</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebar" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebar">
                        <i class=" ri-price-tag-3-line"></i> <span data-key="t-landing">Mã giảm giá</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebar">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.coupons.showCoupon') }}" class="nav-link"
                                    data-key="t-starter">
                                    Danh sách mã giảm giá</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.coupons.addCoupon') }}" class="nav-link" data-key="t-team">
                                    Thêm mới mã giảm giá</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#UserPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="UserPages">
                        <i class="ri-account-circle-line"></i> <span data-key="t-pages">Quản lý người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="UserPages">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link" data-key="t-starter">
                                    Danh sách người dùng</a>
                                <a href="{{ route('admin.users.create') }}" class="nav-link" data-key="t-starter">
                                    Thêm mới người dùng</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a href="{{ route('admin.products.products.create') }}" class="nav-link" data-key="t-team"> Thêm mới người dùng</a> --}}
                            </li>
                        </ul>
                    </div>
                </li>







                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSuppliers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSuppliers">
                        <i class="ri-list-check-2"></i>
                        <span data-key="t-landing">Nhà cung cấp</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSuppliers">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.suppliers.index') }}" class="nav-link" role="button"
                                aria-controls="sidebarSuppliers" data-key="t-calender">
                                Danh sách nhà cung cấp
                            </a>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('admin.suppliers.create') }}" class="nav-link" role="button"
                                aria-controls="sidebarSuppliers" data-key="t-calender">
                                Thêm nhà cung cấp
                            </a>
                        </ul>

                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="#123Pages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="123Pages">
                        <i class="ri-delete-bin-line"></i> <span data-key="t-pages">Thùng rác</span>
                    </a>
                    <div class="collapse menu-dropdown" id="123Pages">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.trashs.index') }}" class="nav-link" data-key="t-starter">
                                    Danh sách dữ liệu</a>

                            </li>
                            <li class="nav-item">
                                {{-- <a href="{{ route('admin.products.products.create') }}" class="nav-link" data-key="t-team"> Thêm mới người dùng</a> --}}
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
