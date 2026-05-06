import "./bootstrap";
import Chart from "chart.js/auto";

const ctx = document.getElementById("growthChart");

if (ctx) {
    const gradient = ctx.getContext("2d").createLinearGradient(0, 0, 0, 280);
    gradient.addColorStop(0, "rgba(19,127,236,0.25)");
    gradient.addColorStop(1, "rgba(19,127,236,0)");

    new Chart(ctx, {
        type: "line",
        data: {
            labels: months,
            datasets: [
                {
                    label: "Teachers",
                    data: teachers,
                    borderColor: "#137fec",
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    borderWidth: 3,
                },
                {
                    label: "Students",
                    data: students,
                    borderColor: "#a5b4fc",
                    borderDash: [6, 6],
                    fill: false,
                    tension: 0.4,
                    pointRadius: 0,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
            },
            scales: {
                x: {
                    display: true, // must be true now
                },
                y: {
                    grid: {
                        color: "rgba(148,163,184,0.1)",
                    },
                },
            },
        },
    });
}
