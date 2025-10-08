
        // Simple JavaScript for dynamic updates
        document.addEventListener('DOMContentLoaded', function() {
            // You can update these values dynamically from your backend later
            const stats = {
                totalProperties: 367,
                totalLandlords: 145,
                totalTenants: 892,
                pendingApprovals: 12,
                bannedUsers: 7,
                reportedListings: 3,
                activeToday: 89
            };

            // Update stats on page (for demonstration)
            Object.keys(stats).forEach(stat => {
                const element = document.getElementById(stat);
                if (element) {
                    element.textContent = stats[stat];
                }
            });

            // Simulate real-time updates (remove this in production)
            setInterval(() => {
                const randomStat = Object.keys(stats)[Math.floor(Math.random() * Object.keys(stats)
                    .length)];
                if (randomStat !== 'totalProperties' && randomStat !== 'totalLandlords' && randomStat !==
                    'totalTenants') {
                    const change = Math.random() > 0.5 ? 1 : -1;
                    stats[randomStat] = Math.max(0, stats[randomStat] + change);
                    document.getElementById(randomStat).textContent = stats[randomStat];

                    // Add visual feedback
                    const element = document.getElementById(randomStat);
                    element.style.color = change > 0 ? '#1cc88a' : '#e74a3b';
                    setTimeout(() => {
                        element.style.color = '';
                    }, 1000);
                }
            }, 5000);
        });

