<?php include $this->resolve("partials/_header.php"); ?>
<!-- Start Main Content Area -->
<section class="layout page-section panel">
    <?php
    // Lightweight summary stats shown in both layouts (styled per breakpoint).
    $txCount = count($transactions);
    $receiptCount = 0;
    foreach ($transactions as $t) {
        $receiptCount += count($t['receipts']);
    }
    ?>
    <!-- Page header: title + New Transaction button -->
    <div class="tx-header flex border-b border-gray-200 pb-4">
        <h4 class="tx-title">Transaction List</h4>
        <a href="/transaction" class="new-tx-btn action-chip action-chip--sky font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            New Transaction
        </a>
    </div>

    <!-- Search Form -->
    <form method="GET" class="search-form">
        <div class="search-form__field">
            <input value="<?= e($searchTerm ?? '') ?>" name="s" type="text" placeholder="Enter search term"
                class="search-form__input" aria-label="Search transactions" />
            <button type="submit" class="search-form__submit">
                Search
            </button>
        </div>
    </form>

    <!-- Summary strip: bento grid on mobile, inline tiles on desktop -->
    <div class="tx-summary" role="list" aria-label="Transaction summary">
        <span class="tx-summary__tile" role="listitem">
            <span class="tx-summary__icon tx-summary__icon--indigo" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 4.5h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </span>
            <span class="tx-summary__meta">
                <span class="tx-summary__label">Transactions shown</span>
                <span class="tx-summary__value"><?= e((string) $txCount) ?></span>
            </span>
        </span>
        <span class="tx-summary__tile" role="listitem">
            <span class="tx-summary__icon tx-summary__icon--sky" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
            </span>
            <span class="tx-summary__meta">
                <span class="tx-summary__label">Page</span>
                <span class="tx-summary__value"><?= e((string) $currentPage) ?> of <?= e((string) $lastPage) ?></span>
            </span>
        </span>
        <span class="tx-summary__tile" role="listitem">
            <span class="tx-summary__icon tx-summary__icon--violet" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
            </span>
            <span class="tx-summary__meta">
                <span class="tx-summary__label">Receipts attached</span>
                <span class="tx-summary__value"><?= e((string) $receiptCount) ?></span>
            </span>
        </span>
    </div>

    <?php if ($txCount === 0): ?>
        <p class="tx-empty">
            No transactions found<?= !empty($searchTerm) ? ' for &ldquo;' . e($searchTerm) . '&rdquo;' : '' ?>.
        </p>
    <?php else: ?>

        <!-- ================= MOBILE LAYOUT: TRANSACTION CARDS =================
             Rendered ONLY below 768px (hidden by the desktop.css media query).
             Styled exclusively in resources/css/mobile.css -> never mixes with
             the desktop table styles. -->
        <div class="tx-cards md:hidden">
            <?php foreach ($transactions as $i => $transaction): ?>
                <article class="tx-card <?= $i === 0 ? 'tx-card--first' : '' ?>">
                    <div class="tx-card__head">
                        <h5 class="tx-card__description"><?= e($transaction['description']) ?></h5>
                        <span class="tx-card__amount"><?= e($transaction['amount']) ?></span>
                    </div>

                    <p class="tx-card__date">
                        <?= e($transaction['formatted_date']) ?>
                    </p>

                    <div class="tx-card__receipts">
                        <?php if (count($transaction['receipts']) > 0): ?>
                            <?php foreach ($transaction['receipts'] as $receipt): ?>
                                <span class="receipt-item">
                                    <a class="receipt-item__link" href="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="receipt-item__icon">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        View receipt
                                    </a>
                                    <form action="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>" method="POST" class="contents">
                                        <?php include $this->resolve("partials/_csrf.php"); ?>
                                        <input type="hidden" name="_METHOD" value="DELETE" />
                                        <button type="submit" class="receipt-item__remove" aria-label="Remove receipt">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="tx-card__no-receipts">No receipts attached</span>
                        <?php endif; ?>
                    </div>

                    <div class="tx-card__actions">
                        <a href="/transaction/<?= e($transaction['id']) ?>/receipt" class="tx-card__action tx-card__action--amber">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                            </svg>
                            Add Receipt
                        </a>
                        <a href="/transaction/<?= e($transaction['id']) ?>" class="tx-card__action tx-card__action--emerald">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Edit
                        </a>
                        <form action="/transaction/<?= e($transaction['id']) ?>" method="POST">
                            <input type="hidden" name="_METHOD" value="DELETE" />
                            <?php include $this->resolve('partials/_csrf.php'); ?>
                            <button type="submit" class="tx-card__action tx-card__action--red">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- ================= DESKTOP LAYOUT: TRANSACTIONS TABLE =================
             Rendered ONLY at 768px and above (hidden by the mobile.css media query).
             Styled exclusively in resources/css/desktop.css -> never mixes with
             the mobile card styles. -->
        <table class="tx-table hidden md:table">
            <thead>
                <tr>
                    <th class="tx-th">Description</th>
                    <th class="tx-th">Amount</th>
                    <th class="tx-th">Receipt(s)</th>
                    <th class="tx-th">Date</th>
                    <th class="tx-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr class="tx-tr">
                        <td class="tx-td tx-td--description"><?= e($transaction['description']) ?></td>
                        <td class="tx-td tx-td--amount"><?= e($transaction['amount']) ?></td>
                        <td class="tx-td">
                            <?php if (count($transaction['receipts']) > 0): ?>
                                <div class="tx-receipts">
                                    <?php foreach ($transaction['receipts'] as $receipt): ?>
                                        <span class="tx-receipt">
                                            <a href="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>" title="View receipt">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="tx-receipt__icon">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                </svg>
                                            </a>
                                            <form action="/transaction/<?= e($transaction['id']) ?>/receipt/<?= e($receipt['id']) ?>" method="POST">
                                                <?php include $this->resolve("partials/_csrf.php"); ?>
                                                <input type="hidden" name="_METHOD" value="DELETE" />
                                                <button type="submit" class="tx-receipt__remove" aria-label="Remove receipt">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <span class="tx-td text-gray-400 italic">—</span>
                            <?php endif; ?>
                        </td>
                        <td class="tx-td"><?= e($transaction['formatted_date']) ?></td>
                        <td class="tx-td tx-td--actions">
                            <div class="tx-actions">
                                <a href="/transaction/<?= e($transaction['id']) ?>/receipt" class="action-btn action-btn--amber" title="Add receipt">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                                    </svg>
                                </a>
                                <a href="/transaction/<?= e($transaction['id']) ?>" class="action-btn action-btn--emerald" title="Edit transaction">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <form action="/transaction/<?= e($transaction['id']) ?>" method="POST" class="contents">
                                    <input type="hidden" name="_METHOD" value="DELETE" />
                                    <?php include $this->resolve('partials/_csrf.php'); ?>
                                    <button type="submit" class="action-btn action-btn--red" title="Delete transaction">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Pagination -->
    <nav class="pagination flex items-center justify-between border-t border-gray-200 px-4 sm:px-0" aria-label="Pagination">
        <!-- Previous Page Link -->
        <div class="flex w-0 flex-1">
            <?php if ($currentPage > 1): ?>
                <a href="/?<?= e($previousPageQuery) ?>" class="pagination__arrow">
                    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z" clip-rule="evenodd" />
                    </svg>
                    Previous
                </a>
            <?php endif; ?>
        </div>
        <!-- Pages Link (desktop only) -->
        <div class="hidden md:flex">
            <?php foreach ($currentPageQuery as $pageNum => $query): ?>
                <a href="/?<?= e($query) ?>" class="pagination__link <?= $currentPage === $pageNum + 1 ? 'pagination__link--active' : '' ?>">
                    <?= e((string) ($pageNum + 1)) ?>
                </a>
            <?php endforeach; ?>
        </div>
        <!-- Next Page Link -->
        <div class="flex w-0 flex-1 justify-end">
            <?php if ($currentPage < $lastPage): ?>
                <a href="/?<?= e($nextPageQuery) ?>" class="pagination__arrow">
                    Next
                    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </nav>
</section>
<!-- End Main Content Area -->
<?php include $this->resolve("partials/_footer.php"); ?>
